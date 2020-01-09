# JH Lauch Prototyp

Eine [Hugo](https://gohugo.io/) site für Markup und Styles.

Hugo version > 0.54 in der extended version für SASS compilation.

``` bash
$ hugo serve
```

für den lokalen dev server

``` bash
$ hugo
```
um die Assets zu bauen.

## Zu Wordpress

Die wichtigsten assets sind Styles, Scripts und Illustrationen.

```$ cp public/sass/main.min.css ../styles/main.min.css```

```$ cp public/js/main.js ../js/main.min.js```
Gleiches für vendored Dependencies `tiny-slider.min.js` und `isotope.min.js`.

```$ cp -r public/images ../images```

Im WP Theme liegt alles auf Topebene.
