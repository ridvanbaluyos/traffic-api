# mmda-api [ ![Codeship Status for ridvanbaluyos/mmda-api](https://app.codeship.com/projects/e1da0740-7807-0134-2318-0e37a99201a3/status?branch=master)](https://app.codeship.com/projects/180084)
This uses the MMDA API to fetch traffic data.

## Usage ##
### Fetching  Traffic Data
```
curl http://developers.gundamserver.com/v1/traffic/:HIGHWAY/:SEGMENT/:DIRECTION
```

### Sample
All Data
```
curl http://developers.gundamserver.com/v1/traffic
```

Highway
```
curl http://developers.gundamserver.com/v1/traffic/EDSA
```

Segment
```
curl http://developers.gundamserver.com/v1/traffic/C5/BAGONG_ILOG
```

Direction
```
curl http://developers.gundamserver.com/v1/traffic/C5/BAGONG_ILOG/NB
```
### Enabling Cache
1. Run `composer install`
2. Create `cache` directory
3. Create `.env` file and add:
```
CACHE_DRIVER=file
CACHE_LIFETIME=1800
```


___
Notes:
- This service is free for anyone to use as long as you don't abuse my server. I reserve the right to block any IP that hits this service too frequently and degrades the service for others. I make no guarantees about this service's availability, quality, or correctness.
- If you need more reliable service, remember you can grab the code and data for this site here and host it yourself!

