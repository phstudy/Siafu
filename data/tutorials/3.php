<link rel='stylesheet' title='Syntax Highlighting' href='data/tutorials/syntax.css' type='text/css'>

<h1>Programming the behavior</h1>
<p>Here's where you get to show those java skills you learned! There are three behavior models that you need to program to get your simulation running:</p>
<ul>
<li>Agent model: what do the agents do, where do they go, etc...</li>
<li>World model: what happens with the places?</li>
<li>Context model: how do the overlays evolve over time?</li>
</ul>
<p>You program them by extending &quot;BaseAgentModel&quot;, &quot;BaseWorldModel&quot; and &quot;BaseContextModel&quot; from the packege &quot;de.nec.nle.siafu.behaviormodels.BaseAgentModel&quot;.</p>
<p>There are always two methods to override: createX and doIteration. The create method is called when the world is created, and allows you to create your Agents, Places or Overlays. The doIteration is called (guess) at each iteration, and allows you to modify them.</p>
<p>For simplicity, we will not change the context or world model here, that is, we will just create a class that extends BaseWorldModel and BaseContextModel. Here you go: <a href="data/tutorials/example/testland/de/nec/nle/siafu/testland/WorldModel.java">WorldModel.java</a> and <a href="data/tutorials/example/testland/de/nec/nle/siafu/testland/ContextModel.java">ContextModel.java</a></p>

<h4>The Agent Behavior model</h4>
<p>We're going to define three types of users for TestLand, each with different behaviors:</p>
<ul>
<li>Agents for interaction: Pietro and Teresa will not be moved automatically. Rather, they'll stand still, waiting for the user to move them with the GUI</li>
<li>&quot;Zombie&quot; agents: they'll just &quot;wander&quot; around the map. They can also be controlled by the GUI, of course.</li>
<li>The courier: a courier for the Czar. He's going to walk from a Nowhere point to another incessantly.</li>
</ul>

<p>I honestly don't know how much detail you guys need here, so, <a href="?what=contact">contact</a> me if this isn't enough.</p>

<p>Let's go through <a href="data/tutorials/example/testland/de/nec/nle/siafu/testland/AgentModel.java">AgentModel.java</a> (<a href="data/tutorials/AgentModel.java.html">colorized</a>).</p>

<h4>AgentModel walkthrough - Creating the agents</h4>
<p>We start with the create agents method. You are going to have to return an ArrayList full with all Agents you need in the simulation. Check this code:</p>

<div class="code"><?php include("data/tutorials/snippets/snippet1.php"); ?></div>

<p>We fill most of the population with automatically created agents, using a generator class which you can ignore for now. It's right here, <a href="data/tutorials/example/testland/de/nec/nle/siafu/testland/AgentGenerator.java">AgentGenerator.java</a> (<a href="data/tutorials/AgentGenerator.java.html">colorized</a>).</p>
<p>However, we need one extra field in the agents, ACTIVITY. Because the AgentGenerator doesn't include this, we do it manually here; because all agents need to have the same fields, we add the ACTIVITY field to each and everyone of them here. We are also doing some other stuff, like making the agents visible, but this is all covered by the API.</p>
<p>This has created all our normal agents, but we want to highlight three special ones: Teresa, Pietro and the Postman. We will also move one of them to the isolated part of the map. In the following snippet, we take those four agents aside, plus a couple of places that we will need later:</p>

<div class="code"><?php include("data/tutorials/snippets/snippet2.php"); ?></div>

<p>Fine, now we need to define the details for these agents. It's all similar really. For Teresa and Pietro, getControl() is important, to keep them from following the behavior of the &quot;normal&quot; agents. The rest is basic property setting, which we detail in the following code chunk. Note that in the case of the isolated user, we change only the position. Also, see how we return our agent list (peolpe) at the end:</p>

<div class="code"><?php include("data/tutorials/snippets/snippet3.php"); ?></div>


<h4>AgentModel walkthrough - Handling the agents</h4>
<p>Let's work on the doIteration method now. This will be called at each iteration of the simulation, and it's our chance to have our agents do whey they need to:

<div class="code"><?php include("data/tutorials/snippets/snippet4.php"); ?></div>

<p>First of all, we take the simulation time and keep it in a static variable. Then we handle the postman (see later) and then everyone else. Note that the method to handle everyone else is handlePerson, but we only call it on that agent if it is on auto (Teresa and Pietro aren't) and is not the postman. It is important that your agent model leaves the user's that are not on auto alone, or the GUI will steal the agents you are moving around!</p>

<p>Now, let's do the handle methods. Pietro and Teresa don't need any further instructions, they will just stay put. Now, the postman is a different issue:</p>

<div class="code"><?php include("data/tutorials/snippets/snippet5.php"); ?></div>

<p>Two things to the postman: his speed and his destination. The speed incrases as he approaches the POSTMAN_PEAK hour. The destination oscilates between the squarish part of the map, and the circular one. While he is not atDestination, nothing happens, and Siafu moves him towards the current destination. As soon as the destination is reached, we sent him back to where he came from.</p>

<p>And finally, the rest of the agents:</p>

<div class="code"><?php include("data/tutorials/snippets/snippet6.php"); ?></div>

<p>We've build a little switch block here, even if it's not really used. The normal agents are always walking, and so all they do is wander (move randomly around). However, it would be easy to make them stop at a certain time of the day, by switching the ACTIVITY field to WAITING. The swith module is left in the tutorial as a canonical example of the state maching that usually governs agents. Check out other simulations for more advanced behaviors.</p>

<p>And that's that! Your agents are ready to rock!</p>
