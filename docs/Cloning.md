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
sudo apt-get install git.
You will be prompted for your password, and Git will then be installed.

#### Installing Repo

Repo, unfortunately, is not on apt, much to our dismay. Instead, please ensure that you have a personal
bin directory in ~/bin. If you do not, simply run $ mkdir ~/bin.
It must also be included in your PATH. Please run $ PATH=~/bin:$PATH.
Download the repo tool with curl and make it executable:
console
    user@computer:~$ curl https://storage.googleapis.com/git-repo-downloads/repo > ~/bin/repo
    user@computer:~$ chmod a+x ~/bin/repo


#### Using Repo

To clone the source with Repo, make a directory for cloning the source. Please note
that this *must be on a case-sensitive filesystem*.
console
    user@computer:~$ mkdir blink
    user@computer:~$ cd blink

Configure Git with your real name and email address:
console
    user@computer:~/blink$ git config --global user.name "YOUR NAME"
    user@computer:~/blink$ git config --global user.email "you@example.com"


To clone the source, you must have an account on our Gerrit server. If you don't, please
go [here](https://147.253.39.57:8080).
console
    user@computer:~/blink$ repo init -u ssh://your_gerrit_username@147.253.39.57:29418/blinkOS/android -b blinkOS-0.1

The repo is now initialised. Run
console
    user@computer:~/blink$ repo sync -j JOBS

JOBS represents the number of simultaneous jobs to run. This will vary depending on your system.

If you have problems with Repo, [troubleshoot here](https://source.android.com/setup/build/downloading).
