---
layout: default
title: Flashing blinkOS using Linux
description: For the users of the superior operating system
---

# Tools

You'll need several tools for flashing:
* `adb`
* `fastboot`
* TWRP

If you've cloned or build lineageOS before, you probably already have `adb` and `fastboot` in `~/bin/platform-tools`.
Otherwise, download them [here]() and TWRP [here]().

# Process

Navigate to the platform-tools directory, just to make things simple, or add platform-tools to your PATH.
Connect your Android device to your computer and enable USB debugging in the Settings menu under Developer Settings.

On your computer, open a terminal and run
```
$ adb reboot bootloader
```

Once it boots into the bootloader, run
```
$ fastboot oem unlock
$ fastboot boot <your-TWRP-image>.img
$ adb shell "twrp wipe system"
$ adb shell "twrp wipe cache"
$ adb shell "twrp wipe data"
$ adb shell "twrp wipe dalvik"
$ adb push blinkOS.zip /
$ adb shell "twrp install /blinkOS.zip"
```
Once it finishes, run 
```
$ adb shell "twrp reboot"
```
Congratulations! blinkOS will now boot.
