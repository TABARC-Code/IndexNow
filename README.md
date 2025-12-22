# IndexNow
A lightweight WordPress plugin to automatically **submit URLs and your sitemap to IndexNow** whenever you publish or update posts, pages, or events.

**IndexNow** is a conservative, production-minded implementation for WordPress.

It submits changed URLs to IndexNow-compatible search engines and then gets out of the way.
There’s no clever orchestration, no speculative optimisation, and no attempt to outsmart WordPress itself.

The design assumes a few things up front:

WordPress will behave inconsistently under load.

Admin users will click “Save” more than once.

External APIs will fail silently, intermittently, and without apology.

The code reflects that reality.

If you’re looking for something flashy or opinionated, this isn’t it.
If you want a small, predictable component that does one job and doesn’t create new failure modes, it probably is.
