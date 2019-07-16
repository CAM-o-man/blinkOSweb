---
layout: default
title: Clone and Contribute
description: How can we help you help us help us all?
---
# How to Clone

Android Open Source projects, and subsequently, blinkOS, use Gerrit as a code review/version control tool.
[Our gerrit server can be found here](https://147.253.39.57:8080).
Like all AOSP projects, we recommend Ubuntu as a build environment.
#### Installing Git

Although we assume you know how to do this, if you're new to Ubuntu, simply open up a terminal and type
```
$ sudo apt-get install git
```

You will be prompted for your password, and Git will then be installed.

#### Installing Repo

Repo, unfortunately, is not on apt, much to our dismay. Instead, please ensure that you have a personal
bin directory in `~/bin`. If you do not, simply run 
```
$ mkdir ~/bin
```

It must also be included in your PATH. Please run 
```
$ PATH=~/bin:$PATH
```
Download the repo tool with curl and make it executable:
```
$ curl https://storage.googleapis.com/git-repo-downloads/repo > ~/bin/repo
$ chmod a+x ~/bin/repo
```


#### Using Repo

To clone the source with Repo, make a directory for cloning the source. Please note
that this *must be on a case-sensitive filesystem*.
```
$ mkdir blink
$ cd blink
```
Configure Git with your real name and email address:
```
$ git config --global user.name "YOUR NAME"
$ git config --global user.email "you@example.com"
```

To clone the source, you must have an account on our Gerrit server. If you don't, please
go [here](https://147.253.39.57:8080).
```
$ repo init -u ssh://your_gerrit_username@147.253.39.57:29418/blinkOS/android -b blinkOS-0.1
```
The repo is now initialised. Run
```
$ repo sync -j JOBS
```
JOBS represents the number of simultaneous jobs to run. This will vary depending on your system.  
`repo sync` will take quite some time, and requires at least 
150 GiB of space.

If you have problems with Repo, [troubleshoot here](https://source.android.com/setup/build/downloading).


# Building blinkOS


There are several tools you will need to build blinkOS:
- platform-tools
  - [download link](https://developer.android.com/studio/releases/platform-tools)
- sdk-tools
  - [download link](https://developer.android.com/studio). Scroll down to see command line tools only.
- ndk-tools
  - [download link](https://developer.android.com/ndk/downloads)
  
Download these to your personal binaries file `~/bin` and add them to your PATH:
```
$ cd ~
$ nano .profile
```
At the bottom of `.profile`, add the following lines:
```
# Added platform-tools to PATH
PATH="$HOME/bin/platform-tools:$PATH"
# Added sdk-tools to PATH
PATH="$HOME/bin/sdk-tools:$PATH"
# Added ndk-tools to PATH
PATH="$HOME/bin/ndk-tools:$PATH"
```
Navigate to the root of your blinkOS source with `cd` and run
```
$ source build/envsetup.sh
```

If you are running Ubuntu 16.04 (xenial) or later, run:
```
$ sudo apt-get install bc bison build-essential ccache curl flex g++-multilib gcc-multilib git gnupg gperf imagemagick lib32ncurses5-dev lib32readline-dev lib32z1-dev liblz4-tool libncurses5-dev libsdl1.2-dev libssl-dev libwxgtk3.0-dev libxml2 libxml2-utils lzop pngcrush rsync schedtool squashfs-tools xsltproc zip zlib1g-dev
```
Otherwise, run
```
$ sudo apt-get install bc bison build-essential ccache curl flex g++-multilib gcc-multilib git gnupg gperf imagemagick lib32ncurses5-dev lib32readline-dev lib32z1-dev liblz4-tool libncurses5-dev libsdl1.2-dev libssl-dev libwxgtk2.8-dev libxml2 libxml2-utils lzop pngcrush rsync schedtool squashfs-tools xsltproc zip zlib1g-dev
```
Ensure you are in the root of the source code, and then
```
$ breakfast sailfish
$ croot
$ brunch sailfish
```

Assuming the build completed successfully, which will be obvious when it completes, acquire the completed build:
```
$ cd $OUT
```
The completed build is `signed-ota-update.zip`


