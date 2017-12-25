'use strict';

require([ 'nosewheelsteering' ], function (noseWheelSteering) {
  var NOSEWHEEL_LEFT = 'Tiller left (Ctrl + [key])';
  var NOSEWHEEL_RIGHT = 'Tiller right (Ctrl + [key])';

  // Only initialise Nose Wheel Steering when GeoFS is ready.
  var initTimer = setInterval(function () {
    if (typeof controls !== 'object' || !controls.airbrakes) return;

    var keys = geofs.preferences.keyboard.keys;
    var defaultKeys = geofs.preferencesDefault.keyboard.keys;

    defaultKeys[NOSEWHEEL_LEFT] = { keycode: 188, label: '<' };
    defaultKeys[NOSEWHEEL_RIGHT] = { keycode: 190, label: '>' };

    if (!keys[NOSEWHEEL_LEFT]) keys[NOSEWHEEL_LEFT] = defaultKeys[NOSEWHEEL_LEFT];
    if (!keys[NOSEWHEEL_RIGHT]) keys[NOSEWHEEL_RIGHT] = defaultKeys[NOSEWHEEL_RIGHT];

    var $document = $(document);
    var oldKeyDown = controls.keyDown;
    var oldKeyUp = controls.keyUp;

    $document
      .off('keydown', oldKeyDown)
      .off('keyup', oldKeyUp);

    // Reassign to keyUp/keyDown to allow other extensions to override these functions.
    controls.keyDown = function (event) {
      // We don't care about anything else if steering key combination is pressed, so don't run
      // the normal event handler.
      if (event.ctrlKey && event.which === keys[NOSEWHEEL_LEFT].keycode) {
        controls.states.steerLeft = true;
        controls.states.rudderLeft = false;
        event.preventDefault();
      } else if (event.ctrlKey && event.which === keys[NOSEWHEEL_RIGHT].keycode) {
        controls.states.steerRight = true;
        controls.states.rudderRight = false;
        event.preventDefault();
      } else {
        return oldKeyDown(event);
      }
    };

    controls.keyUp = function (event) {
      // This shows which key was released, so the keyup for each key will fire independently.
      if (event.ctrlKey || event.which === keys[NOSEWHEEL_LEFT].keycode) {
        controls.states.steerLeft = false;
      }

      if (event.ctrlKey || event.which === keys[NOSEWHEEL_RIGHT].keycode) {
        controls.states.steerRight = false;
      }

      // Original keyup handler should still run.
      return oldKeyUp(event);
    };

    $document
      .keydown(controls.keyDown)
      .keyup(controls.keyUp);

    var Aircraft = geofs.aircraft.Aircraft;
    var load = Aircraft.prototype.load;
    Aircraft.prototype.load = function (aircraftId, coordinates, bJustReload) {
      // allow us to keep track of whether the function has loaded new aircraft yet (async)
      var oldParts = geofs.aircraft.instance.parts;

      // call original aircraft load function
      load.apply(this, arguments);

      var timer = setInterval(function () {
        if (geofs.aircraft.instance.parts !== oldParts) {
          // Aircraft load has completed.
          noseWheelSteering(aircraftId);
          clearInterval(timer);
        }
      }, 16);
    };

    if (geofs.aircraft.instance) {
      // allow us to keep track of whether the function has loaded new aircraft yet (async)
      var oldParts = geofs.aircraft.instance.parts;
      var timer = setInterval(function () {
        if (geofs.aircraft.instance.parts !== oldParts) {
          // Aircraft load has completed.
          noseWheelSteering(geofs.aircraft.instance.id);
          clearInterval(timer);
        }
      }, 16);
    }

    clearInterval(initTimer);
  }, 16);
});
