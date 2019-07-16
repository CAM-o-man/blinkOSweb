---
layout: default
title: Flashing blinkOS using Mac
description: Installing blinkOS for Mac users
---

# Tools

Installing blinkOS will require several tools:
* `adb`
* `fastboot`
* TWRP

If you've already cloned or built blinkOS, chances are you have `adb` and `fastboot` already. If not, they
can be downloaded [here]() and [TWRP here]().

# Process

Once all of the tools are installed, plug your Android device into your computer with a USB cable and enable developer
mode by tapping the "About System" button 7 times. Enable USB debugging in Developer Settings.

Please note that installing blinkOS *will* wipe your phone, so be sure you're backed up.

Open a terminal and either add `platform-tools` to your PATH or navigate to the folder.

Run
```
$ adb reboot bootloader
```
Once the bootloader has booted, run
```
$ fastboot oem unlock
$ fastboot boot <your-twrp-image>.img
```
Wait for TWRP to boot. It will prompt you for a PIN or pattern. Do not enter one. Click Cancel and swipe right to unlock the filesystem.

Run
```
$ adb shell "twrp wipe system"
$ adb shell "twrp wipe cache"
$ adb shell "twrp wipe data"
$ adb shell "twrp wipe dalvik"
$ adb push blinkOS.zip /
$ adb shell "twrp install /blinkOS.zip"
```
Once the install is complete, run
```
$ adb shell "twrp reboot"
```

blinkOS is now installed on your device. Congratulations!