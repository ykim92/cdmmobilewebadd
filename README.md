CONTENTdm Mobile Web Add Form
===============

This is a plugin for OCLC's CONTENTdm collection that provides a mobile-friendly interface for adding items to your collection on mobile devices. This plugin should allow anyone with the web URL to upload files to server, but only as pending items in approval queue of the collection.


What's Included
--------------
    * index.php
    * process.php

'index.php' is the main webpage that displays the form for you to input file and metadata. Upon submit, it will pass the input to 'process.php', which uploads the file and metadata to your server as a Pending Item in the Approval Queue. 
Status message of whether the upload was successful or not will be displayed, including any error messages. 

Installation
---------------
    * Requires CONTENTdm 6.5

1. Go to your CONTENTdm Website Configuration Tool page.
2. Under 'Collections' tab, choose the collection you want to add the cdmmobilewebadd plugin from the Editing collection drop-down-list.
3. Go to 'Custom Pages/Scripts' from the sidebar navigation, and then to 'Custom Pages'. Add Custom Page and enter "CDM Mobile Web Add" for Name. Save changes.
4. Go to 'Manage files' and enter the "cdmmobilewebadd" directory. Go to 'Upload' tab and upload both 'index.php' and 'process.php'. Exit from the popup window. Publish.
5. Go to 'Tools" from the sidebar navigation, and then to 'Permissions'. Enable login, and enter your username and password in the Web Add Form Username and Password fields. Publish.
6. Your cdmmobilewebadd plugin should be added to the collection. It is found on https://[Hostname]/cdm/cdmmobilewebadd/collection/[Collection_Alias]?page=0
7. For your convenience, save this link on your mobile device's web browser.

Customization
-----------------
The entire UI is created with jQuery Mobile and is fully customizable with jQuery Mobile's online editor, [ThemeRoller](http://jquerymobile.com/themeroller/). Upload the CSS file in the same cdmmobilewebadd directory.
