# mmda-api
This uses the MMDA API to fetch traffic data.

## Usage ##
### Fetching  Traffic Data
```
curl http://api.mmda.local/v1/traffic/:HIGHWAY/:SEGMENT/:DIRECTION
```

### Sample
```
curl http://api.mmda.local/v1/traffic/EDSA
```

```
curl http://api.mmda.local/v1/traffic/C5/BAGONG_ILOG
```

```
curl http://api.mmda.local/v1/traffic/C5/BAGONG_ILOG/NB
```

___
Note: This is still in progress and the API calls might still change. Use at your own risk.
