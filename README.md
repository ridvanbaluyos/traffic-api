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
Notes:
- MMDA API library not yet committed. I'll try to iron it out first and make it PSR-4 compliant.
- This is still in progress and the API calls might still change. Use at your own risk.
