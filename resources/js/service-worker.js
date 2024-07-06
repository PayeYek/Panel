import { precacheAndRoute } from 'workbox-precaching';
import { registerRoute } from 'workbox-routing';
import { NetworkFirst } from 'workbox-strategies';

precacheAndRoute(self.__WB_MANIFEST);

registerRoute(
    ({ request }) => request.destination === 'document',
    new NetworkFirst()
);

self.addEventListener('push', function(event) {
    const data = event.data.json();

    console.log("******************************")
    console.log(data)
    console.log("******************************")

    const title = data.title;
    const options = {
        body: data.body,
        icon: '/icon.png',
        badge: '/badge.png'
    };
    event.waitUntil(self.registration.showNotification(title, options));
});
