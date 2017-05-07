<h1>InfoPresenter Readme</h1>

<h3><b>Things to be done:</b></h3>
<ul>
<li>A lot</li>
</ul>
<h3><b>Completed</b></h3>
<ul>
<li>Login module</li>
<li>Signup module</li>
<li>Menu</li>
<li>Bootstrap and jQuery integration</li>
</ul>

<h3>Setting up the database - subject to change :)</h3>
<br />
<p>Alright, I have made it a little bit easier than before... Open xampp, make sure apache and mysql is running. Open your browser and go to localhost/webpresenter/start.php</p>
<p>That page should automatically create the database and the required tables for everything to work. Just make sure that the connections.php have the right passwords and whatnot</p>
<p>Right now its just the standard (localhost/root/no password) so if you have just installed XAMPP without changing anything, it should work... If not change the settings in conncections.php, and make sure NOT TO UPLOAD THAT FILE</p>
<p>If the above doesnt work for whatever reason just do as I have written below</p>


<p>Create a database called Webpresenter</p>
<p>Create a table called users with the following coloumns</p>
<ul>
<li>NAME: id, TYPE: int(11), ATTRIBUTES: PRIMARY KEY, AUTO INCREMENT, UNIQUE</li>
<li>NAME: usernames, TYPE: varchar(50), ATTRIBUTES: UNIQUE</li>
<li>NAME: passwords, TYPE: varchar(255)</li>
</ul>

<p>Create another table called user_presentation_table with the following columns
<ul>
<li>NAME: ID, TYPE: int(11), ATTRIBUTES: PRIMARY KEY, AUTO INCREMENT, UNIQUE</li>
<li>NAME: user, TYPE: VARCHAR(50)</li>
<li>NAME: description, TYPE: VARCHAR(255)</li>
</ul>