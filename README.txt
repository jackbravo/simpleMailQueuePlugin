# simple mail queue plugin #

The simpleMailQueuePlugin is a symfony plugin that provides a simple model to
which save mails to be sent by the application.

It also provides tasks that process the mail_queue table.

It requires the Zend_Mail class and works for symfony 1.2.

To configure the plugin you need this on your app.yml file:

    all:
      zend_lib_dir: /usr/share/php5/zf-lib-1.7

      smtp:
        ssl: tls
        port: 587
        auth: login
        server: smtp.gmail.com
        username: sample@gmail.com
        password: secret

To add mails to the mail_queue you use the MailQueue model:

    $mail = new MailQueue();
    $mail->setSubject('Title for the mail');
    $mail->setBody('Body for the mail');
    $mail->addTo('sample@gmail.com');
    $mail->addTo('another@mail.com');
    $mail->save();

To send the emails you can execute the following command:

    php symfony mail:send-mails 100

This task needs to be run periodically so your emails get sent, so add it to
your cron.
