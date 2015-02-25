# mmda-api
This uses the MMDA API to fetch traffic data.

## Usage ##
### Fetching  Traffic Data
```
curl http://mmda.ewoklabs.net/v1/traffic/:HIGHWAY/:SEGMENT/:DIRECTION
```

### Sample
```
curl http://mmda.ewoklabs.net/v1/traffic
```

```
curl http://mmda.ewoklabs.net/v1/traffic/EDSA
```

```
curl http://mmda.ewoklabs.net/v1/traffic/C5/BAGONG_ILOG
```

```
curl http://mmda.ewoklabs.net/v1/traffic/C5/BAGONG_ILOG/NB
```

___
Notes:
- There is no error handling yet.
- This is still in progress and the API calls might still change. Use at your own risk.

