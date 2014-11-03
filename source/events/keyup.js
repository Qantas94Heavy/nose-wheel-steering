'use strict';

define(function () {
  var originalEventCleared = false;
  var originalHandler = controls.keyUp;
  
  function keyUp(event) {
    var activeHandlers = $(document).data('events').keyup;
    
    if (!originalEventCleared) {
      for (var i = 0; i < activeHandlers.length; ++i) {
        if (activeHandlers[i].handler === originalHandler) {
          $(document).off('keyup', originalHandler);
          originalEventCleared = true;
          break;
        }
      }
    }
    
    // jshint sub:true
    // TODO: refactor function in a more modular way
    // FIXME: mozilla keycodes issue
    switch (event.which) {
      case ges.preferences.keyboard.keys['Bank left'].keycode:
        controls.states.left = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Bank right'].keycode:
        controls.states.right = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Pitch down'].keycode:
        controls.states.up = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Pitch up'].keycode:
        controls.states.down = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Steer left'].keycode:
        controls.states.rudderLeft = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Steer right'].keycode:
        controls.states.rudderRight = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Increase throttle'].keycode:
      case ges.preferences.keyboard.keys.PgUp.keycode:
        controls.states.increaseThrottle = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case ges.preferences.keyboard.keys['Decrease throttle'].keycode:
      case ges.preferences.keyboard.keys.PgDwn.keycode:
        controls.states.decreaseThrottle = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
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
      case 90:
        // Z
        controls.states.steerLeft = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
      case 88:
        // X
        controls.states.steerRight = false;
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        break;
    }
  }
  
  return keyUp;
});
