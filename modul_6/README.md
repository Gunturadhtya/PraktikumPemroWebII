## SETUP GUIDE

1. copy .env.example
```
cp .env.example .env
```

2. Run the docker container
```
docker-compose up -d
```

3. Install the necessary package from npm and run the npm
```
npm install
npm run dev
```

4. wait till finish
```
docker compose logs -f app
```

5. migrate database
```
docker compose exec app php artisan migrate:fresh --seed
```

website is on localhost:8000