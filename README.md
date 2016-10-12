# mmda-api
This uses the MMDA API to fetch traffic data.

## Usage ##
### Fetching  Traffic Data
```
curl https://chirpa.ewoklabs.net/mmda-api/v1/traffic/:HIGHWAY/:SEGMENT/:DIRECTION
```

### Sample
All Data
```
curl https://chirpa.ewoklabs.net/mmda-api/v1/traffic
```

Highway
```
curl https://chirpa.ewoklabs.net/mmda-api/v1/traffic/EDSA
```

Segment
```
curl https://chirpa.ewoklabs.net/mmda-api/v1/traffic/C5/BAGONG_ILOG
```

Direction
```
curl https://chirpa.ewoklabs.net/mmda-api/v1/traffic/C5/BAGONG_ILOG/NB
```
### Enabling Cache
1. Run `composer install`
2. Create `cache` directory
3. Create `.env` file and add:
```
CACHE_DRIVER=file
```


___
Notes:
- There is no error handling yet.
- This is still in progress and the API calls might still change. Use at your own risk.


