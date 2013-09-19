V3.duplicate = V3.dup;
Aircraft.prototype.load = function (aircraftName, coordinates, justReload)
{	var href = PAGE_PATH
			 + (aircraftName.indexOf('/') !== -1
			 ? aircraftName + '/aircraft.kml?killcache=' 
			 : 'models/aircrafts/' + aircraftName + '/' +  aircraftName + (ges.PRODUCTION
																		? '.kmz?killcache=' 
																		: '-kmz/aircraft.kml?killcache=')
			 ) + ges.killCache;
	this._cockpitLoaded = false;
	google.earth.fetchKml(ge, href, function (kmlObject)
	{	setTimeout(function ()
		{	if (kmlObject)
			{	var aircraft = ges.aircraft;
				try
				{ 	var setup = aircraft.setup
				              = eval(kmlObject.getDescription())[0];
				} catch (e)
				{	ges.debug.alert('Error loading aircraft: ' + e);
					ges.undoPause();
				}
				aircraft.controllers =
					{ pitch:
						{ recenter: false
						, sensitivity: 1
						, ratio: 1 }
					, roll:
						{ recenter: true
						, sensitivity: 1
						, ratio: 1 }
					, yaw:
						{ recenter: true
						, sensitivity: 1
						, ratio: 1 }
					};
				aircraft.unloadAircraft();
				aircraft.name = aircraftName;
				aircraft.parts = {};
				aircraft.airfoils = [];
				var engines = aircraft.engines
				            = [];
				aircraft.buoys = [];
				aircraft.wheels = [];
				aircraft.collisionPoints = [];
				aircraft.lights = [];
				if (!setup.scale) setup.scale = 1;
				if (!setup.startupTime) setup.startupTime = 0;
				if (!setup.com) setup.com = [0, 0, 0];
				setup.startAltitude *= setup.scale;
				if (!setup.cockpitScaleFix) setup.cockpitScaleFix = 1;
				for (var i in setup.cameras)
				{	var definition = setup.cameras[i];
					definition.distance *= setup.scale;
					if (definition.position) definition.position = V3.scale(definition.position, setup.scale);
				}
				aircraft.placemarks = {};
				aircraft.kmlObjects = [];
				var root = 
					{ name: 'root'
					, position: setup.com || [0, 0, 0] };
				aircraft.object3d = new Object3D(root);
				// place parts inside empty objects defined above
				aircraft.addParts(setup.parts, kmlObject, setup.scale);
				aircraft.boundingSphereRadius = 0;
				for (var i = 0, l = aircraft.collisionPoints.length; i < l; i++) aircraft.boundingSphereRadius = Math.max(aircraft.boundingSphereRadius, V3.length(aircraft.collisionPoints[i]));
				aircraft.boundingSphereRadius *= 1.5;
				for (var i in setup.contactProperties)
				{	var contact = setup.contactProperties[i];
					if (!contact.lockSpeed) contact.lockSpeed = 0.01;
				}
				aircraft.object3d.render(
					{ llaCoordinates: aircraft.llaLocation
					, collisions: true }
				);
				for (var i = setup.parts.length; i--;)
				{	var part = setup.parts[i];
					if (part.suspension)
					{	part.suspension.origin = [part.collisionPoints[0][0], part.collisionPoints[0][1], 0];
						var suspensionHeight = -part.collisionPoints[0][2];
						part.suspension.restLength = suspensionHeight;
						if (part.suspension.motion === 'rotation')
						{	var rotationRadius = V3.length(part.collisionPoints[0]);
							var restAngle = Math.atan2(part.collisionPoints[0][0] / rotationRadius, part.collisionPoints[0][2] / rotationRadius);
							var deltaAngle = restAngle < 0 ? restAngle + halfPi : restAngle - halfPi;
							part.suspension.motionFactor = deltaAngle / part.suspension.restLength;
							part.suspension.rotationMethod = 'setRotation' + (part.suspension.axis || 'Y');
						}
						if (!part.suspension.hardPoint) part.suspension.hardPoint = part.suspension.restLength * 0.5;
						part.points.origin = V3.duplicate(part.suspension.origin);
						part.points.suspensionOrigin = V3.duplicate(part.suspension.origin);
					}
				}
				if (!aircraft.rigidBody) aircraft.rigidBody = new rigidBody;
				aircraft.rigidBody.setMassProps(setup.mass, setup.tensorFactor);
				setup.RPM2PropAS = setup.driveRatio * 6;
				aircraft.engine.invRPMRange = 1 / (setup.maxRPM - setup.minRPM);
				var shadow = aircraft.shadow
				           = ge.createGroundOverlay('');
				shadow.setIcon(ge.createIcon(''));
				shadow.setLatLonBox(ge.createLatLonBox(''));
				shadow.setAltitudeMode(ge.ALTITUDE_CLAMP_TO_SEA_FLOOR);
				shadow.getIcon().setHref(setup.shadowURL);
				shadow.setVisibility(true);
				ge.getFeatures().appendChild(shadow);
				aircraft.shadowBox = setup.shadowBox;
				aircraft.shadowBox[2] = 0;
				aircraft.shadowBox = V3.scale(aircraft.shadowBox, setup.scale);
				instruments.init(setup.instruments);
				audio.init(setup.soundSet, setup.sounds);
				ges.preferences.aircraft = aircraftName;
				if (!setup.autopilot) controls.autopilot.turnOff();
				var READ_ONLY = { writable: false };
				if (Object.defineProperties) for (var i = 0, l = engines.length; i < l; ++i) Object.defineProperties(
					engines[i],
					{ thrust: READ_ONLY
					, reverseThrust: READ_ONLY
					, afterBurnerThrust: READ_ONLY }
				);
				noseWheelSteering(aircraftName);
				ges.flyTo(coordinates, !!justReload);
			} else
			{	alert('Error loading aircraft file');
				ges.undoPause();
			}
		});
	});
};

function noseWheelSteering(aircraftName)
{	var ratio;
	function set(noseWheel, tillerNoseAngle, rudderNoseAngle)
	{ 	return function ()
		{	var anim = ges.aircraft.wheels[noseWheel].animations[0];
			anim.value = "steeringAngle";
			ratio = rudderNoseAngle / (anim.ratio = tillerNoseAngle);
		};
	}
	var aircrafts = 
		{ a380: set(4, 75, 7)
		, md11: set(3, 70, 10)
		, cessna: set(2, 30, 8.5)
		, AN140: set(2, 35, 5) 
		, concorde: set(2, 60, 10) 
		, su35: set(4, 45, 5) 
		, dc3: set(0, -45, -3) 
		, alphajet: set(2, 35, 5) 
		, zlin: set(2, -30, -2) };
	(aircrafts[aircraftName] || function () { ratio = 1; })();
	controls.nwAngle = 0;
	controls.updateKeyboardGeneral = function (dt)
	{	var throttleIncrement = controls.keyboard.throttleIncrement * dt;
		if (controls.states.increaseThrottle) controls.throttle += throttleIncrement;
		else if (controls.states.decreaseThrottle) controls.throttle -= throttleIncrement;
		
		var sensitivity = ges.preferences.keyboard.sensitivity * ges.aircraft.controllers.yaw.sensitivity;
		var yawIncrement = controls.keyboard.yawIncrement * dt * sensitivity * ges.aircraft.controllers.yaw.ratio;
		
		var notSteering = false;
		if (controls.states.steerLeft) controls.nwAngle = clamp(controls.nwAngle - yawIncrement, -1, 1);
		else if (controls.states.steerRight) controls.nwAngle = clamp(controls.nwAngle + yawIncrement, -1, 1);
		else notSteering = true;

		if (controls.states.rudderLeft)
		{	controls.yaw -= yawIncrement;
			if (notSteering)
				if (Math.abs(controls.nwAngle) < ratio) controls.nwAngle = clamp(controls.nwAngle - yawIncrement * ratio, -ratio, ratio);
				else controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;
		} else if (controls.states.rudderRight)
		{	controls.yaw += yawIncrement;
			if (notSteering)
				if (Math.abs(controls.nwAngle) < ratio) controls.nwAngle = clamp(controls.nwAngle + yawIncrement * ratio, -ratio, ratio);
				else controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;
		} else if (ges.aircraft.controllers.yaw.recenter)
		{	controls.yaw -= controls.yaw * controls.keyboard.recenterRatio * sensitivity;
			if (notSteering) controls.nwAngle -= controls.nwAngle * controls.keyboard.recenterRatio * sensitivity;
		}
		ges.aircraft.animationValue.steeringAngle = controls.nwAngle;
	};
}

// reset keydown - FIXME: if event listener already added, no effect to original
controls.keyDown = function (event) // TODO: refactor function in a more modular way, FIXME: mozilla keycodes issue
{	var keys = ges.preferences.keyboard.keys;
	switch (event.which)
	{	case keys['Bank left'].keycode:
			controls.states.left = true;
			event.returnValue = false;
			controls.keyboard.override = true;
			break;
		case keys['Bank right'].keycode:
			controls.states.right = true;
			event.returnValue = false;
			controls.keyboard.override = true;
			break;
		case keys['Pitch down'].keycode:
			controls.states.up = true;
			event.returnValue = false;
			controls.keyboard.override = true;
			break;
		case keys['Pitch up'].keycode:
			controls.states.down = true;
			event.returnValue = false;
			controls.keyboard.override = true;
			break;
		case keys['Steer left'].keycode:
			controls.states.rudderLeft = true;
			event.returnValue = false;
			break;
		case keys['Steer right'].keycode:
			controls.states.rudderRight = true;
			event.returnValue = false;
			break;
		case keys['Increase throttle'].keycode:
		case keys.PgUp.keycode:
			controls.states.increaseThrottle = true;
			event.returnValue = false;
			break;
		case keys['Decrease throttle'].keycode:
		case keys.PgDwn.keycode:
			controls.states.decreaseThrottle = true;
			event.returnValue = false;
			break;
		case keys.Brakes.keycode:
			controls.setters.setBrakes.set();
			break;
		case keys['Parking brake'].keycode:
			controls.setters.toggleParkingBrake.set();
			break;
		case keys['Engine switch (on/off)'].keycode:
			(ges.aircraft.engine.on ? ges.aircraft.stopEngine : ges.aircraft.startEngine)();
			break;
		case keys['Gear toggle (up/down)'].keycode:
			controls.setters.setGear.set();
			break;
		case keys['Lower flaps'].keycode:
			controls.setters.setFlapsDown.set();
			break;
		case keys['Raise flaps'].keycode:
			controls.setters.setFlapsUp.set();
			break;
		case keys['Airbrake toggle (on/off)'].keycode:
			controls.setters.setAirbrakes.set();
			break;
		case keys['Elevator trim up'].keycode:
			controls.setters.setElevatorTrimUp.set();
			break;
		case keys['Elevator trim down'].keycode:
			controls.setters.setElevatorTrimDown.set();
			break;
		case keys['Elevator trim neutral'].keycode:
			controls.setters.setElevatorTrimNeutral.set();
			break;
		case 13:
			controls.recenterKeyboard();
			break;
		case 27:
			if (flight.recorder.playing)
			{	flight.recorder.exitPlayback();
				event.preventDefault();
			}
			break;
		case 86:
			flight.recorder.enterPlayback();
			break;
		case 65:
			controls.autopilot.toggle();
			break;
		case 83:
			audio.toggleMute();
			break;
		case 80:
			ges.togglePause();
			break;
		case 67:
			camera.cycle();
			break;
		case 78:
			ui.toggleMap();
			break;
		case 79:
			ges.togglePreferencesPanel();
			break;
		case 9:
			ges.flyToCamera();
			break;
		case 72:
			instruments.toggle();
			break;
		case 77:
			controls.setMode('mouse');
			break;
		case 75:
			controls.setMode('keyboard');
			break;
		case 74:
			controls.setMode('joystick');
			break;
		case 82:
			ges.resetFlight();
			break;
		case 101:
			camera.setToNeutral();
			break;
		case 97:
			camera.setRotation(45);
			break;
		case 98:
			camera.setRotation(0);
			break;
		case 99:
			camera.setRotation(-45);
			break;
		case 100:
			camera.setRotation(90);
			break;
		case 102:
			camera.setRotation(-90);
			break;
		case 103:
			camera.setRotation(135);
			break;
		case 104:
			camera.setRotation(180);
			break;
		case 105:
			camera.setRotation(-135);
			break;
		// nose wheel steering
		case 90: // Z
			controls.states.steerLeft = true;
			event.returnValue = false;
			break;
		case 88: // X
			controls.states.steerRight = true;
			event.returnValue = false;
			break;
	}
	if (event.which > 47 && event.which < 58) controls.throttle = (event.which - 48) / 9; // range 48-57
};

controls.keyUp = function (event) // TODO: refactor function in a more modular way, FIXME: mozilla keycodes issue
{	switch (event.which)
	{	case ges.preferences.keyboard.keys['Bank left'].keycode:
			controls.states.left = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Bank right'].keycode:
			controls.states.right = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Pitch down'].keycode:
			controls.states.up = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Pitch up'].keycode:
			controls.states.down = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Steer left'].keycode:
			controls.states.rudderLeft = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Steer right'].keycode:
			controls.states.rudderRight = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Increase throttle'].keycode:
		case ges.preferences.keyboard.keys.PgUp.keycode:
			controls.states.increaseThrottle = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Decrease throttle'].keycode:
		case ges.preferences.keyboard.keys.PgDwn.keycode:
			controls.states.decreaseThrottle = false;
			event.returnValue = false;
			break;
		case ges.preferences.keyboard.keys['Elevator trim up'].keycode:
			controls.setters.setElevatorTrimUp.unset();
			break;
		case ges.preferences.keyboard.keys['Elevator trim down'].keycode:
			controls.setters.setElevatorTrimDown.unset();
			break;
		case ges.preferences.keyboard.keys.Brakes.keycode:
			controls.setters.setBrakes.unset();
			break;
		case 84:
			ui.openChat();
			break;
		// nose wheel steering add-on
		case 90: // Z
			controls.states.steerLeft = false;
			event.returnValue = false;
			break;
		case 88: // X
			controls.states.steerRight = false;
			event.returnValue = false;
			break;	
	}
};