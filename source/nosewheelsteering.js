'use strict';

define(function () {
  // Default aircraft do not have nosehweel angles specified.
  var aircrafts =
    { a380: [ 4, 70, 6 ]
    , md11: [ 3, 70, 10 ]
    , cessna: [ 2, 30, 8.5 ]
    , AN140: [ 2, 60, 5 ]
    , concorde: [ 2, 60, 10 ]
    , su35: [ 4, 45, 5 ]
    , dc3: [ 0, -45, -3 ]
    , alphajet: [ 2, 35, 5 ]
    , zlin: [ 2, -30, -2 ]
    , sportstar: [ 2, 15, 0 ]
    };

  function noseWheelSteering(aircraftName) {
    var ratio = 1;
    function set(options) {
      var noseWheelIndex = options[0];
      var tillerNoseAngle = options[1];
      var rudderNoseAngle = options[2];
      // unused at the moment
      // var lockoutSpeed = options[3];

      var anim = gefs.aircraft.wheels[noseWheelIndex].animations[0];
      anim.value = 'steeringAngle';
      anim.ratio = tillerNoseAngle;
      ratio = rudderNoseAngle / tillerNoseAngle;
    }

    if (gefs.aircraft.setup.nosewheel) set(gefs.aircraft.setup.nosewheel);
    else if (aircrafts[aircraftName]) set(aircrafts[aircraftName]);

    controls.nwAngle = 0;
    controls.updateKeyboardGeneral = function (dt) {
      var throttleIncrement = controls.keyboard.throttleIncrement * dt;
      if (controls.states.increaseThrottle) controls.throttle += throttleIncrement;
      else if (controls.states.decreaseThrottle) controls.throttle -= throttleIncrement;

      var yawController = gefs.aircraft.controllers.yaw;
      var sensitivity = gefs.preferences.keyboard.sensitivity * yawController.sensitivity;
      var yawIncrement = controls.keyboard.yawIncrement * dt * sensitivity * yawController.ratio;

      var notSteering = false;
      if (controls.states.steerLeft) {
        controls.nwAngle = clamp(controls.nwAngle - yawIncrement, -1, 1);
      } else if (controls.states.steerRight) {
        controls.nwAngle = clamp(controls.nwAngle + yawIncrement, -1, 1);
      }
      else notSteering = true;

      function recenterNoseWheel() {
        var nwIncrement = controls.keyboard.recenterRatio * sensitivity * ratio;

        if (controls.nwAngle < 0) controls.nwAngle += nwIncrement;
        else controls.nwAngle -= nwIncrement;
      }

      if (controls.states.rudderLeft) {
        controls.yaw -= yawIncrement;

        if (notSteering) {
          // let nose wheel recentre if nose position beyond max rudder steering
          if (Math.abs(controls.nwAngle) < ratio) {
            controls.nwAngle = clamp(controls.nwAngle - yawIncrement * ratio, -ratio, ratio);
          }
          else recenterNoseWheel();
        }
      } else if (controls.states.rudderRight) {
        controls.yaw += yawIncrement;

        if (notSteering) {
          // let nose wheel recentre if nose position beyond max rudder steering
          if (Math.abs(controls.nwAngle) < ratio) {
            controls.nwAngle = clamp(controls.nwAngle + yawIncrement * ratio, -ratio, ratio);
          }
          else recenterNoseWheel();
        }
      } else if (gefs.aircraft.controllers.yaw.recenter) {
        controls.yaw -= controls.yaw * controls.keyboard.recenterRatio * sensitivity;
        // recenter nosewheel if no other nosewheel input
        if (notSteering) recenterNoseWheel();
      }

      gefs.aircraft.animationValue.steeringAngle = controls.nwAngle;
    };
  }

  return noseWheelSteering;
});
