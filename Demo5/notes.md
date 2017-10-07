# Demo 5
Docker Compose

## Running Docker Compose
```sh
docker-compose up
```

## Add DB Table
Enter the container
```sh
docker-compose exec db mysql -u root -p cplugstuff
```
Create the table
```sql
CREATE TABLE attendees (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, lastname VARCHAR(20), firstname VARCHAR(20));
```

## View In Browser
http://localhost:8080
