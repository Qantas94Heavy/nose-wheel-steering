'use strict';

define(function () {
  // Default aircraft do not have nosehweel angles specified.
  var defaultAircrafts =
    { '2': [ 2, 30, 10 ] // Cessna 172
    , '3': [ 2, 35, 5 ] // Alphajet
    , '4': [ 2, 78, 7 ] // Boeing 737-700
    , '5': [ 2, 35, 18.3 ] // Embraer Phenom 100
    , '6': [ 0, -45, -3 ] // DC-3
    , '7': [ 3, 70, 10 ] // MD11
    , '8': [ 4, 45, 5 ] // SU-35
    , '9': [ 4, 70, 6 ] // A380
    , '10': [ 2, 60, 10 ] // Concorde
    , '11': [ 2, -30, -2 ] // Zlin Z-50
    , '12': [ 2, 30, 8.5 ] // Cessna 152
    , '16': [ 2, 60, 5 ] // An-140
    , '40': [ 2, 15, 0 ] // Sportstar
    };

  function noseWheelSteering(aircraftId) {
    var aircraft = geofs.aircraft.instance;

    var ratio = 1;
    function set(options) {
      var noseWheelIndex = options[0];
      var tillerNoseAngle = options[1];
      var rudderNoseAngle = options[2];
      // TODO: add lockout speed

      var anim = aircraft.wheels[noseWheelIndex].animations[0];
      anim.value = 'steeringAngle';
      anim.ratio = tillerNoseAngle;
      ratio = rudderNoseAngle / tillerNoseAngle;
    }

    if (aircraft.setup.nosewheel) set(aircraft.setup.nosewheel);
    else if (defaultAircrafts[aircraftId]) set(defaultAircrafts[aircraftId]);

    controls.rawNwAngle = 0;
    controls.nwAngle = 0;

    var oldUpdate = controls.update;
    controls.update = function (dt) {
      oldUpdate(dt);

      var yawController = aircraft.controllers.yaw;
      var sensitivity = geofs.preferences.keyboard.sensitivity * yawController.sensitivity;
      var yawIncrement = controls.keyboard.yawIncrement * dt * sensitivity * yawController.ratio;

      var notSteering = false;
      if (controls.states.steerLeft) {
        controls.rawNwAngle = clamp(controls.rawNwAngle - yawIncrement * Math.sqrt(ratio), -1, 1);
      } else if (controls.states.steerRight) {
        controls.rawNwAngle = clamp(controls.rawNwAngle + yawIncrement * Math.sqrt(ratio), -1, 1);
      } else {
        notSteering = true;
      }

      if (aircraft.controllers.yaw.recenter && notSteering) {
        // recenter nosewheel if no other nosewheel input
        var nwIncrement = controls.keyboard.recenterRatio * sensitivity * Math.sqrt(ratio);
        controls.rawNwAngle -= controls.rawNwAngle * nwIncrement;
      }

      controls.nwAngle = controls.rawNwAngle + controls.yaw * ratio;
      controls.nwAngle = clamp(controls.nwAngle, -1, 1);
      aircraft.animationValue.steeringAngle = controls.nwAngle;
    };
  }

  return noseWheelSteering;
});
