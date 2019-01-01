# Messenger Workshop

Go into docker container 

```bash
docker exec -it container_name sh
```

Rabbit mq
```$shell
php bin/console messenger:consume-messages amqp
```

Webhook
```
php bin/console messenger:consume-messages http
```
