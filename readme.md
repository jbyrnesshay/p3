
# P3: Developers Best Friend 
# author: Joachim Byrnes-Shay
# project 3 for Digital Web Applications
# 10/26/2016

## Live URL
<http://p3.midnightoil.me>

## Description
This is a user configurable Developer's Best Friend application, with 2 functions.
1.  A Lorem Ipsum generator of 1 to 50 paragraphs per usage.  This is configurable for language (latin or english) a
and for number of paragraphs.  Additionally, the output is presented in two ways,
as a text only display and a true developer's version, which is text with html paragraph tags.  T
The means by way this functionality was attained is described both on the live URLs welcome page and within the code.  
The Lorem Ipsum app uses the external package Badcow as a generator, but methods and properties are used to configure a custom dictionary if selected.  

2.  A Fake User generator.  This will present a first and last name, a full street address, phone #, 
email, password by default.  There is the option to include a brief profile, an avatar, or both.
The avatar creation uses the external package laravolt/avatar and takes the first and last initial of the fake user and 
displays them in a generated colored png image.  Much use was made of the internal fzaninotto/faker package for much of 
the other data.  However the profile blurb is created from several areas of phrases, using rychrandom to mix and match
these phrases randomly for each user generated.


## Credits
The english language word file of 109502 words, wordsEn.txt, is credited to www-01.sil.org/linguistics/wordlists/english.  
Other than the external packages referenced as Outside code below, all programming and styling by myself, Joachim Byrnes-Shay.

## Screencast Demo
http://screencast.com/t/AGDG5YVP8

## Usage Details 
1.  Lorem Ipsum.
User is presented the ability to configure  the language (English or Latin) option, 
and the number of paragraphs (1 to 50).  The result is displayed in 2 columns, left column is a demo, display only, right column is text with 
paragraph tags, allowing the user to copy/paste the appropriate content based on their individual needs.

2.  Fake User.
User is given the ability to select the number of users (required) equalling 1 to 50, and the option (not required) to include 
an avatar, a small profile blurb (2-3 sentences), or both.
Left column output is a demo, a clean display version, presenting each item of data along with its label (name, address, etc)
Right column output is a development ready .json object, again allowing the user an alternative format of the data based upon individual need.  
 

## Outside code
3 external packages were used, 2 of which were not discussed in class
Those are:
Laravolt/Avatar, at github.com/laravolt/avatar
Badcow, at github.com/Badcow/LoremIpsum
Rych-Random, at https://github.com/rchouinard/rych-random
