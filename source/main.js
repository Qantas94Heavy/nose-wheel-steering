'use strict';

require([ 'nosewheelsteering' ], function (noseWheelSteering) {
  var keyboardTimer = setInterval(function () {
    if (!controls.airbrakes) return;

    $(document)
      .off('keydown', controls.keyDown)
      .off('keyup', controls.keyUp)
      .keydown(function (event) {
        if (event.which === 90) {
          // Z
          controls.states.steerLeft = true;
          event.preventDefault();
        } else if (event.which === 88) {
          // X
          controls.states.steerRight = true;
          event.preventDefault();
        }
        else return controls.keyDown(event);
      }).keyup(function (event) {
        if (event.which === 90) {
          // Z
          controls.states.steerLeft = false;
          event.preventDefault();
        } else if (event.which === 88) {
          // X
          controls.states.steerRight = false;
          event.preventDefault();
        }
        else return controls.keyUp(event);
      });

    clearInterval(keyboardTimer);
  }, 16);

  var load = Aircraft.prototype.load;
  Aircraft.prototype.load = function (aircraftName, coordinates, bJustReload) {
    // allow us to keep track of whether the function has loaded new aircraft yet (async)
    var oldParts = gefs.aircraft.parts;

    // call original aircraft load function
    load.apply(this, arguments);

    var timer = setInterval(function () {
      if (gefs.aircraft.parts !== oldParts) {
        // ges.aircraft.load has completed.
        noseWheelSteering(aircraftName);
        clearInterval(timer);
      }
    }, 16);
  };
});
