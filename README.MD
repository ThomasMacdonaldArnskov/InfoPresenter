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