BitCam Project
=======================================

This project has been developed to show ways to use free information to break privacy of people. (in a educational way).

![Example](http://fesoft.net/bitcam/ex.png)

How it works
---------------------------------------

It's necessary two informations: Latitude;Longitude. Using [Instagram] (http://instagram.com/developer/) API we are able to capture all places that people have been taking pictures or using on foursquare. After the capture you can list all the images and videos that has been posted on instagram of that places.

Installing
-----------------------------------------

First of all you need to have an instagram account; than its necessary that you create a Client, in case you dont have any idea on how to do this [take a look here.] (http://instagram.com/developer/clients/register/)

After your created the Client its necessary that you change the load.php file with your new informations.

<pre>
$GLOBALS["config"] = array(
	'client_id' => '',
	'client_secret' => '',
	'redirect_uri' => '',
	'token' => ''
);
</pre>

<dt>Token Information</dt>
  <dd>The token code is received after the autentication. If you already have this token and you don't want to be authenticating every time you open the project you can just save your token code on the project,or just leave it with nothing. (Remember that the token may expire!)   </dd>
</dl>

TO-DO List
-----------------------------------------

* Update some code in the core class.
* Include Twitter API to capture tweets on location
* Use a time based filter

License
-----------------------------------------

You can do whatever you want with this. I just ask you to contribute with this code if you have more ideas.
