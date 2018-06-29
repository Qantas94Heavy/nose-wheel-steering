README
======

Nose Wheel Steering extension v{0} for GeoFS

How to Use
----------

First install the Nose Wheel Steering extension using the installation
instructions below, then load GeoFS.

Now you will be able to use "Ctrl" + "<" to steer left, and "Ctrl" + ">" to
steer right.

If you would like to change the key bindings for steering, you can do so by
assigning a new key in the Options menu.

Most default and community contributed aircraft are supported. If a community
contributed aircraft does not support this extension, you will need to ask the
developer of the aircraft to add support for Nose Wheel Steering.

Installation Instructions
-------------------------

### Firefox (recommended):

1. Install Greasemonkey, if you have not already done so.
2. Extract this ZIP file into an empty folder.
3. Open Firefox, then drag and drop "{1}.user.js" into the Firefox window.
4. Click "Install" after the timer countdown finishes.

### Google Chrome for Windows:

1. Install Tampermonkey, if you have not already done so.
2. Extract this ZIP file into an empty folder.
3. Open Google Chrome, then click Menu -> More tools -> Extensions.
4. Find the Tampermonkey extension, then tick "Allow access to file URLs".
5. Open a new tab, then drag and drop "{1}.user.js" into the window.
6. Click "Install" in the window that appears.

### Microsoft Edge (14.14393+):

> Please note that Internet Explorer is *not* supported.

1. Install Tampermonkey, if you have not already done so.
2. Extract this ZIP file into an empty folder.
5. Open Microsoft Edge, then drag and drop "{1}.user.js" into the window.
6. Click "Install" in the window that appears.

### Google Chrome and Chromium:

**Note: users of Google Chrome on Windows _must_ use the method above to
install Autopilot++, not this method.**

1. Extract this ZIP file into an empty folder.
2. Open Google Chrome/Chromium, then click on the menu button at the top right.
3. Hover over the Tools sub-menu, then click on Extensions.
4. If applicable, uninstall any previous versions of the plugin.
5. Drag and drop "{2}.crx" into the Extensions page.
6. Click "Accept" when it asks for permissions.

### Opera (15+):

1. Extract this ZIP file into an empty folder.
2. Open Opera, then click on the Opera menu button and click Extensions.
3. Drag and drop "{2}.crx" into the Extensions page.
4. Click Install on the popup.

License
-------

    Copyright (c) 2013-2018 Karl Cheng
    Copyright (c) 2015 Harry Xue

    If you'd like to contact me, please send an email to
    <qantas94heavy@gmail.com>.

    This program is free software: you can redistribute it and/or modify it
    under the terms of the GNU General Public License as published by the
    Free Software Foundation, either version 3 of the License, or (at your
    option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

[Version 3 of the GPL][1] is included in LICENSE.html for your reference.

  [1]: http://www.gnu.org/licenses/gpl-3.0.html

Source Code
-----------

You can get the source code of this program from
<https://github.com/Qantas94Heavy/nose-wheel-steering>.

Release Notes
-------------

### Changes in v1.0.3 (current version)

 - Add support for HTTPS version of GeoFS

### Changes in v1.0.2 (last version)

 - Add nosewheel steering parameters for new DHC-6 Twin Otter aircraft
 - Fix steering settings for existing planes affected by aircraft ID changes

### Changes in v1.0.1

 - Fix landing gear and steering problems with the new Embraer Phenom 100
 - Fix steering settings for the Douglas DC-3

### Changes in v1.0.0

 - **NOTE: you must uninstall any older versions of Nose Wheel Steering before
   installing v1.0.0. This is because of the name change from GEFS to GeoFS.**
 - Custom key bindings now available in the options menu!
 - Changed default keys: "Ctrl" + "<" for left, "Ctrl" + ">" for right
 - Fix compatibility with the change to new GeoFS (version 2.1)
 - Add support for Cessna 172 and Boeing 737-700
 - Improved, simplified logic for steering control

### Changes in v0.3.0

 - This version now supports the Cesium version of GEFS.
 - The README file is now converted to an HTML file for easier viewing.
 - New community contributed aircraft no longer require an update of
   the Nose Wheel Steering extension.
