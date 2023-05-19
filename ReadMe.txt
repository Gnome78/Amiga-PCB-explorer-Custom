Hi there !
Amiga PCB Explorer Custom is a tool for amiga computer repair.
It's based on the project of the same name available only in 'surf mode' on internet, no source available, no update.
Here it's not the case.
All data are proposed : Data mysql and PHP & Javascript code.

Please don't use this tool to really re-create pcb's, it was never intended for that and it won't work for sure.
Also understand that I am not a developer, at the beginning of this project, I had never written a line of code in javascript.
The code is obviously not optimized and contains surely some errors but it has the advantage :
- To be available for everyone.
- You can use it, improve it, change it.
- Contains much less errors than the original tool.
- Brings new functions compared to the original tool.
- It contains extra data.

In order to use it you have to install the couple : mysql + apache similar.

You can, for example, use WampServer.
Of course you have to create the databases and import the data from this repository.
You will have to modify the ConnectOnceToMyDB.php file in order to indicate the name of the server, the name of the user and the password previously created to access these data.

It took me a lot of time and energy to collect and rewrite from scratch this tool.
I still work on it and correct and improve the code from time to time.

Now, it's up to you to bring your touch to the project.


More information about table and data :
- COMPONENT	table containt information for search and over component and so, the 'finger/silk'
- DATASVG	table of all SVG elements of each PCB.
- FULL_SVG	a big one. table to point 'each click_dot' to a 'LINE' number and, a lot of information.
- LINE		each copper 'line' with all elements (flash, click, linetop, linebot...)

/!\
LINE0 always corresponds to a 'null' copper.
LINE1 always corresponds to GROUNDs (all ground, video, audio, genereic gnd).


More information, soon :)
