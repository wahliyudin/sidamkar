// host // "ui.dev"
// hostname // "ui"
// href // "https://ui.dev/get-current-url-javascript/?comments=false"
// origin // "https://ui.dev"
// pathname // "/get-current-url-javascript/""
// port // ""
// protocol // "https:"
// search // "?comments=false"
const {
    host,
    hostname,
    href,
    origin,
    pathname,
    port,
    protocol,
    search
} = window.location

function url(path) {
    return origin + path;
}
