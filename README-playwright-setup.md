# Playwright setup

The E2E suite drives the Google Chrome installed on the host through Playwright's `chrome` channel. Install Google Chrome before running the suite; no Playwright browser download is needed. Video recording is disabled so Playwright's optional FFmpeg download is not required either.

Run the tests with:

```bash
npm run test:e2e
```
