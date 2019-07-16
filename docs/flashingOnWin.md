---
layout: default
title: Using Windows to flash blinkOS
description: For the users of the world's most popular OS
---

# Tools

You'll need several tools to install blinkOS:
* `adb`
* `fastboot`
* TWRP

If you've built blinkOS or cloned the source, you may already have `adb` and `fastboot`.
TWRP can be downloaded [here](website down insert here)

# Process

Connect your Android device to your computer with a USB cable and enable developer mode by tapping
"About Phone" seven times.
Enable USB debugging in the Developer Settings.

Make sure your device is backed up, as the next step *will* wipe your phone entirely.

On your computer, open up Command Prompt, navigate to the folder where you installed `adb` and `fastboot`, 
and run
```
 > ./adb reboot bootloader
```

Your phone will then boot into the bootloader. It should say somewhere that the bootloader is unlocked.
If it does not, run
```
./fastboot oem unlock
```
You must boot into TWRP. Run
```
./fastboot boot <your twrp file>.img
```
TWRP will then boot. It will request a PIN or pattern, but do not enter it. SImply press Cancel and then slide to
unlock.

Tap "Wipe" and the "Advanced Wipe".
Check all the boxes, then wipe them.

Then, on your computer, type
```
./adb push blinkOS.zip /
```
Tap "Install" on your phone, tap "Up A Folder", at the top, then scroll down and tap blinkOS.zip.

Tap Install.
Your phone will now install blinkOS. Wait until it is completed, and then on your computer type
```
./adb shell "twrp reboot"
```
blinkOS will now boot. You're done!