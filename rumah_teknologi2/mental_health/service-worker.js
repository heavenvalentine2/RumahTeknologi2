const OFFLINE_URL = "offline.php";

self.addEventListener("install", function(event) {
	event.waitUntil(
		caches.open("pwa").then(function(cache) {
			return cache.addAll([
        './',
				'index.php',
				'offline.php',
        'assets/css/app.css',
        'assets/js/script.js',
			]);
		})
	);
});


self.addEventListener("fetch", function(event) {
  if (event.request.mode === "navigate") {
    event.respondWith(
      (async () => {
        try {
          // First, try to use the navigation preload response if it's
          // supported.
          const preloadResponse = await event.preloadResponse;
          if (preloadResponse) {
            return preloadResponse;
          }

          // Always try the network first.
          const networkResponse = await fetch(event.request);
          return networkResponse;
        } catch (error) {
          // catch is only triggered if an exception is thrown, which is
          // likely due to a network error.
          // If fetch() returns a valid HTTP response with a response code in
          // the 4xx or 5xx range, the catch() will NOT be called.
          setTimeout(() => {
            console.log("Fetch failed; returning offline page instead.", event.request);
          }, 3000);
          const cache = await caches.open("pwa");
          const cachedResponse = await cache.match(OFFLINE_URL) ;
          return cachedResponse;
        }
      })()
    );
  }

  // If our if() condition is false, then this fetch handler won't
  // intercept the request. If there are any other fetch handlers
  // registered, they will get a chance to call event.respondWith().
  // If no fetch handlers call event.respondWith(), the request
  // will be handled by the browser as if there were no service
  // worker involvement.
});