
This API gets the Traffic Data for Metro Manila.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/98000faef03e4b419bda0dbc3bfef0bb)](https://www.codacy.com/app/ridvanbaluyos/traffic-api?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ridvanbaluyos/traffic-api&amp;utm_campaign=Badge_Grade)

## Usage ##
### Fetching  Traffic Data
```
curl http://developers.gundamserver.com/api/v1/traffic/feed?highway=<highway>&segment=<segment>&direction=<direction>
```

### Sample
All Data
```
curl http://developers.gundamserver.com/api/v1/traffic/feed
```

Highway
```
curl http://developers.gundamserver.com/api/v1/traffic/feed?highway=EDSA
```

Segment
```
curl http://developers.gundamserver.com/api/v1/traffic/feed?highway=C5&segment=BAGONG_ILOG
```

Direction
```
curl http://developers.gundamserver.com/api/v1/traffic/feed?highway=C5&segment=BAGONG_ILOG&direction=NB
```

Getting highways
```
curl http://developers.gundamserver.com/api/v1/traffic/highways
```

Getting highway segments
```
curl http://developers.gundamserver.com/api/v1/traffic/segments?highway=EDSA
```
___

### Notes:
- This service is free for anyone to use as long as you don't abuse my server. I reserve the right to block any IP that hits this service too frequently and degrades the service for others. I make no guarantees about this service's availability, quality, or correctness.
- If you need more reliable service, remember you can grab the code and data for this site here and host it yourself.

