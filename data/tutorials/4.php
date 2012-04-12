<h1>Packing your simulation</h1>
<p>For Siafu to run your simulation, you still need to conform to a directory structure and write a config file. You're almost there!</p>

<h4>The directory structure</h4>
<p>In short, <a href="data/tutorials/example/testland.jar">this</a> is how your files have to end up. There are three directories, one for your classess, one for the configuration, and one for all the images, and we'll go through them in the next sections. For reference, here are the full contents of <a href="data/tutorials/example/testland.jar">testland.jar</a>:</p>

<ul>
	<li>/etc/config.xml: The configuration file</li>
   	<li>/packagename/*: your behavior classes and others</li>
    <li>/res/map: backround and wall files</li>
    <li>/res/overlays: overlayfiles</li>
    <li>/res/places: the images defining place coordinates</li>
    <li>/res/sprites: the images representing your agents as they move</li>
</ul>

<h4>/etc/config.xml: simulation configuration</h4>
<p>A file describing what is what in the simulation. Take this <a href="data/tutorials/example/testland/etc/config.xml">config.xml</a>. Do check the overlay types, where you can see how binary, discrete and real overlays are mapped to their context values.</p>

<h4>Your classes</h4>
<p>You need to extend the Agent, World and Context model, and those classes, together with any that you may need, have to be in a folder, which will constitude your package name. Don't forget to point to them in the confifuration file for the simulation.</p>

<h4>/res/map: all those images</h4>
<p>All the images have to be in PNG format, and have the same dimensions as background.png. Map contains the background and walls images, overlays has the initial values of the context overlays, and places has an image per place type, as explained <a href="?what=tutorial&step=2">before</a>.</p>

<h4>/res/sprites: sprites?</h4>
<p>Yes. Sprites. Those little guys that move around. Or boats. Or cars or anything you want! For starters I suggest you take the sprites taht come in <a href="data/tutorials/example/testland.jar">testland.jar</a>. You can always modify them later. Again, you need to point to the right set (you get three sizes in testland.jar) in the config file</p>

<p>The naming of the sprites is important. Each PNG follows the format (SpriteName)-(FeetRow).(FeetCol)-(Direction).png, where:</p>
<ul>
	<li>SpriteName is anything you like, but consistent for all the directions. You use this name to refer to the sprite in the behavior models.</li>
	<li>FeetRow and FeetCol: the row (0 on top) and column (0 on the left) in which the sprite's "feet" are. It's easy on the humans, but cars pivot somewhat diferent, so watch out.</li>
    <li>Direction: A number from 0 to 7 where 0, 1, 2, 3... 6, 7 represents facing North, NE, E, SE... W, NW respectively.</li>
</ul>

<h4>Done!</h4>
<p>And you are done! The final result should resemble <a href="data/tutorials/example/testland.jar">testland.jar</a>. You may put it in a jar or leave it in an open directory, Siafu will accept both. I recommend you pack it all only when you're done with the simulation, to avoid re-jarring at each fix.</p>

<p>And you're done! Now go ahead and do a cool simulation, and if you can, share it! We'd love to put it on the simulations section! Again, feedback appreciated on the whole of Siafu, and specially on the completeness of this tutorial so you know, you can find me <a href="?what=simulations&simtitle=testland">here</a>.</p>