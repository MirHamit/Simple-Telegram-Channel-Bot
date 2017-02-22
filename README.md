# Simple-Telegram-Channel-Bot <br>
 this bot can send messages to your channel with inline keyboard and long message with picture priview <br>
<br>
<br>
# 1 : set SSL to your domain to set webhook<br>
you can use cloudflare.com or ask from google.com<br>
<br>
# 2 : set webhook<br>
after set SSL to your domain you have to set your webhook, for example :<br>
https://api.telegram.org/bot(mytoken)/setWebhook?url=https://tabriz.li/sourcetobot/tg.php<br>
<br>
# 3 : edit source <br>
in tg.php :<br>
define your bot token in line 3<br>
define your Webhook_URL in line 119<br>
<br>
in message.php : <br>
define your channel name with '@' in line 3<br>
define your admins id in line 4<br>
customize your messages in bot ( READ THE SOURCE )<br>
<br>
# 4 : set your bot admin in your channel<br>
you done<br>
just send a pm to your bot with /kanal message and bot will send your messages to channel with HTML Markup<br>
<br>
supported HTML tags :<br>
you can see full list in here:<br>
https://core.telegram.org/bots/api#html-style
<br>
<br>
<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<a href="http://www.example.com/">inline URL</a>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>

