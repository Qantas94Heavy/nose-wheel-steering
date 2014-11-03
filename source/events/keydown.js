'use strict';

define(function () {
  var originalEventCleared = false;
  var originalHandler = controls.keyDown;
  
  function keyDown(event) {
    var activeHandlers = $(document).data('events').keydown;
    
    if (!originalEventCleared) {
      for (var i = 0; i < activeHandlers.length; ++i) {
        if (activeHandlers[i].handler === originalHandler) {
          $(document).off('keydown', originalHandler);
          originalEventCleared = true;
          break;
        }
      }
    }
    
    // jshint sub:true
    var keys = ges.preferences.keyboard.keys;
    switch (event.which) {
      case keys['Bank left'].keycode:
        controls.states.left = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        controls.keyboard.override = true;
        return;
      case keys['Bank right'].keycode:
        controls.states.right = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        controls.keyboard.override = true;
        return;
      case keys['Pitch down'].keycode:
        controls.states.up = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        controls.keyboard.override = true;
        return;
      case keys['Pitch up'].keycode:
        controls.states.down = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        controls.keyboard.override = true;
        return;
      case keys['Steer left'].keycode:
        controls.states.rudderLeft = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      case keys['Steer right'].keycode:
        controls.states.rudderRight = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      case keys['Increase throttle'].keycode:
      case keys.PgUp.keycode:
        controls.states.increaseThrottle = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      case keys['Decrease throttle'].keycode:
      case keys.PgDwn.keycode:
        controls.states.decreaseThrottle = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      case keys['Brakes'].keycode:
        controls.setters.setBrakes.set();
        return;
      case keys['Parking brake'].keycode:
        controls.setters.toggleParkingBrake.set();
        return;
      case keys['Engine switch (on/off)'].keycode:
        var aircraft = ges.aircraft;
        aircraft.engine.on ? aircraft.stopEngine() : aircraft.startEngine();
        return;
      case keys['Gear toggle (up/down)'].keycode:
        controls.setters.setGear.set();
        return;
      case keys['Lower flaps'].keycode:
        controls.setters.setFlapsDown.set();
        return;
      case keys['Raise flaps'].keycode:
        controls.setters.setFlapsUp.set();
        return;
      case keys['Airbrake toggle (on/off)'].keycode:
        controls.setters.setAirbrakes.set();
        return;
      case keys['Elevator trim up'].keycode:
        controls.setters.setElevatorTrimUp.set();
        return;
      case keys['Elevator trim down'].keycode:
        controls.setters.setElevatorTrimDown.set();
        return;
      case keys['Elevator trim neutral'].keycode:
        controls.setters.setElevatorTrimNeutral.set();
        return;
      case 13:
        controls.recenterKeyboard();
        return;
      case 27:
        if (flight.recorder.playing) {
          flight.recorder.exitPlayback();
          event.preventDefault();
        }
        return;
      case 86:
        flight.recorder.enterPlayback();
        return;
      case 65:
        controls.autopilot.toggle();
        return;
      case 83:
        audio.toggleMute();
        return;
      case 80:
        ges.togglePause();
        return;
      case 67:
        camera.cycle();
        return;
      case 78:
        ui.toggleMap();
        return;
      case 79:
        ges.togglePreferencesPanel();
        return;
      case 9:
        ges.flyToCamera();
        return;
      case 72:
        instruments.toggle();
        return;
      case 77:
        controls.setMode('mouse');
        return;
      case 75:
        controls.setMode('keyboard');
        return;
      case 74:
        controls.setMode('joystick');
        return;
      case 82:
        ges.resetFlight();
        return;
      case 101:
        camera.setToNeutral();
        return;
      case 97:
        camera.setRotation(45);
        return;
      case 98:
        camera.setRotation(0);
        return;
      case 99:
        camera.setRotation(-45);
        return;
      case 100:
        camera.setRotation(90);
        return;
      case 102:
        camera.setRotation(-90);
        return;
      case 103:
        camera.setRotation(135);
        return;
      case 104:
        camera.setRotation(180);
        return;
      case 105:
        camera.setRotation(-135);
        return;
      // nose wheel steering
      case 90:
        // Z
        controls.states.steerLeft = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      case 88:
        // X
        controls.states.steerRight = true;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        return;
      }
      if (event.which > 47 && event.which < 58) controls.throttle = (event.which - 48) / 9; // range 48-57
  }
  
  return keyDown;
});