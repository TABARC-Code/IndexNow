## Idiot’s Guide (Read This If You Just Want It to Work) ##
This section exists because documentation usually assumes too much. and to be fair This one doesn’t.

What you are trying to achieve?

You want search engines that support IndexNow to be told when a page on your site changes or is deleted.

That’s it.
Nothing more ambitious is happening here.

This plugin does not crawl your site.
It does not submit your entire sitemap repeatedly.
It does not “optimise SEO”.

It sends polite notifications and stops. Thats IT!!!!! to te dick who made that bloody APP THE 

Step 1: Install the plugin

Download the plugin ZIP.

Go to WordPress Admin → Plugins → Add New.

Click Upload Plugin.

Upload the ZIP.

Activate IndexNow.

If you can’t activate a plugin, fix that first.
Nothing else will work until this does.

Step 2: Generate an IndexNow key

IndexNow requires a key file. This is not optional.

The key is just a random string stored in a text file.

Example key value:

1234567890abcdef1234567890abcdef


That value must exist in a file named:

1234567890abcdef1234567890abcdef.txt


And that file must be publicly accessible at:

https://your-site.com/1234567890abcdef1234567890abcdef.txt


If that URL returns 404, IndexNow will ignore every request you send.
It will not tell you.
It will simply do nothing.

Before continuing, open the URL in a browser and confirm it loads.

Step 3: Configure the plugin

Go to:

Settings → IndexNow

You will see a field labelled IndexNow Key.

Paste only the key value, not the filename, not the URL.

Correct:

1234567890abcdef1234567890abcdef


Incorrect:

1234567890abcdef1234567890abcdef.txt
https://your-site.com/1234567890abcdef1234567890abcdef.txt


Click Save.

That is the entire configuration.

If you’re looking for more switches, there aren’t any. This is intentional.

What happens next

When you:

publish a post

update a post

delete a post

the plugin quietly queues the affected URL.

At the end of the request, it sends a single batched notification to the IndexNow endpoint.

This avoids:

hammering external APIs

slowing down the editor

creating fragile background jobs

You do not need to manually “submit” anything.

When it looks like nothing is happening

This is normal.

IndexNow is deliberately quiet.
Search engines do not confirm success in a human-friendly way.

If you want reassurance, check the basics:

The key file URL loads in a browser.

The content is publicly accessible.

The content is not blocked by robots.txt or noindex.

You are not expecting instant indexing. That is not how this works.

If all four are true, the plugin has done its job.

Common mistakes (and how to avoid them)

“I saved the post five times.”
Fine. The plugin deduplicates URLs.

“I changed themes and it stopped working.”
Check the key file still exists.

“Nothing shows up in Search Console.”
IndexNow is not Search Console.

“Can you add logs?”
You can. They are not enabled by default because logs leak information.

If you still want more control

You probably don’t need it.
But if you do, you’re already outside the “idiot guide” zone and should read the rest of the README.

This plugin is intentionally small.
That’s why it stays reliable.
