var cacheName = 'Stageocache-v1'
var filesToCache = [
    '/templates/head.php',
    '/templates/header.php',
    '/templates/footer.php',
    '/js/app.js',
    '/templates/carousel.php',
    '/vendors/jquery/jquery-3.6.0.min.js',
    '/vendors/bootstrap/css/bootstrap.css',
    '/vendors/bootstrap/css/bootstrap-grid.css',
    '/vendors/bootstrap/css/bootstrap-utilities.css',
    '/vendors/bootstrap/js/bootstrap.js',
    '/vendors/bootstrap/js/bootstrap.bundle.js',
    '/vendors/fontawesome/css/all.css',
    '/vendors/fontawesome/js/all.js',
    '/img/maskable_icon_x48.png',
    '/img/maskable_icon_x72.png',
    '/img/maskable_icon_x96.png',
    '/img/maskable_icon_x128.png',
    '/img/maskable_icon_x192.png',
    '/img/maskable_icon_x384.png',
    '/img/maskable_icon_x512.png',
    '/img/image_1.jpg',
    '/img/image_2.jpg',
    '/img/image_3.jpg',
    '/img/image_4.jpg',
    '/img/image_5.jpg',
    '/img/image_6.jpg',
     '/',
]; 

self.addEventListener('install', function(e) {
    console.log('[Service Worker] Installation'); 
    e.waitUntil(
        caches.open(cacheName).then(function(cache){
            console.log('[Service Worker] Global caching: shell app and content');
            return cache.addAll(filesToCache);
        })
    );
});

self.addEventListener('fetch', (e) => {
    e.respondWith(
      caches.match(e.request).then((r) => {
            console.log('[Service Worker] Recovery of the resource: '+e.request.url);
        return r || fetch(e.request).then((response) => {
                  return caches.open(cacheName).then((cache) => {
            console.log('[Service Worker] Caching of the new resource: '+e.request.url);
            cache.put(e.request, response.clone());
            return response;
          });
        });
      })
    );
  });

self.addEventListener('activate', function(event) {
    event.waitUntil(
        this.caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.filter(function(name) {
                    return name != cacheName
                }).map(function(cacheName){
                    return caches.delete(cacheName);
                })
            );
        })
    );
});