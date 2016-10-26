 #P3: Developers Best Friend, Joachim Byrnes-Shay
# 10/26/2016

## Live URL
<http://p3.midnightoil.me>

## Description
This is a user configurable Developer's Best Friend application, with 2 functions.
1.  A Lorem Ipsum generator.  This is configurable for language (latin or english) a
and for number of paragraphs.  Additionally, the output is presented in two ways,
text only and text with html <p> tags.  The Lorem Ipsum generator uses the external 
package Badcow.  The Latin configuration uses the base functionality of Badcow. 
If the user selects thee English configuration, a custom class EnglishDict is instantiated, and
this class uses an added text file (in storage). The word list is based on a word list (text file) of 109582 English words..  RychRandom is used
to randomly select 500 of them for the purposes of constructing the app dictionary (per each usage).
Badcow properties, including a Badcow property setwords() which allows to assign a custom dictionary,
are then used to present this English "Lorem Ipsum".   
2.  A Fake User generator.  This will present a first and last name, a full street address, phone #, 
email, password by default.  There is the option to include a brief profile, an avatar, or both.
The avatar creation uses the external package laravolt/avatar and takes the first and last initial of the fake user and 
displays them in a generated colored png image.  Much use was made of the internal fzaninotto/faker package for much of 
the other data.  However the profile blurb is created from several areas of phrases, using rychrandom to mix and match
these phrases randomly for each user generated.


## Credits
The english language word file, wordsEn.txt, is from www-01.sil.org/linguistics/wordlists/english.  
All programming and styling by myself, Joachim Byrnes-Shay.

## Screencast Demo
to be inserted

## Usage Details 
1.  Lorem Ipsum.
User is presented the ability to configure  the language (English or Latin) option, 
and the number of paragraphs.  The result is displayed in 2 columns, left column is text only, right column is text with 
paragraph tags, allowing the user to copy/paste the appropriate content based on their individual needs.
2.  Fake User.
User is given the ability to select the number of users (required), and the option (not required) to include 
an avatar, a small profile blurb (2-3 sentences), or both.
Left column out put is a structured presentation of each item of data along with its label (name, address, etc)
Right column output is a .json object, again allowing the user an alternative format of the data based upon individual need.  
 

## Outside code
External packages:
Badcow
Laravolt/Avatar
RychRandom
