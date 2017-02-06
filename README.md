# mmda-api [ ![Codeship Status for ridvanbaluyos/mmda-api](https://app.codeship.com/projects/e1da0740-7807-0134-2318-0e37a99201a3/status?branch=master)](https://app.codeship.com/projects/180084)
This uses the MMDA API to fetch traffic data.

## Usage ##
### Fetching  Traffic Data
```
curl http://rx-78-2.gundamserver.com/mmda-api/v1/traffic/:HIGHWAY/:SEGMENT/:DIRECTION
```

### Sample
All Data
```
curl http://rx-78-2.gundamserver.com/mmda-api/v1/traffic
```

Highway
```
curl http://rx-78-2.gundamserver.com/mmda-api/v1/v1/traffic/EDSA
```

Segment
```
curl http://rx-78-2.gundamserver.com/mmda-api/v1/traffic/C5/BAGONG_ILOG
```

Direction
```
curl http://rx-78-2.gundamserver.com/mmda-api/v1/traffic/C5/BAGONG_ILOG/NB
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
- There is no error handling yet.
- This is still in progress and the API calls might still change. Use at your own risk.


