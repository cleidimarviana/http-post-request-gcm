# http-post-request-gcm
Send HTTP POST Request from PHP Server to Google Messaging Service

## Overview
To send notification messages to Android devices you need first to send a POST request from your application to the Google Cloud Messaging Service (GCM) instructing it to send notifications. Here we have a simulator in which you can send a POST to an Android application via Google Key ID, Token generated in the app and the desired message.


## Get Google API Key Server

1. Go to the [Google Console][1]
2. Create a new project / open project
3. Click on 'APIs & Auth' on the left
4. Find the 'Google Cloud Messaging for Android' option, and press off to turn it on
5. Go to the creditials tab on the left
6. Go the 'Public API access' section and click 'Create new key'
7. Choose 'Server key' and click 'Create'
8. The API key is now shown under the section 'Key for server applications'

Feedback
----
Questions, comments, and feedback are welcome at cleidimarviana@gmail.com

License
----

The MIT License (MIT)

Copyright (c) 2016 Cleidimar Viana 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

**Free Software, Hell Yeah!**

[1]: https://console.developers.google.com