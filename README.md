> A project component to the [Intro to PHP](https://github.com/willemlabu/intro-to-php) shortcourse at The Open Window.

# 52 Card Shuffle

An API + UI to shuffle a deck of cards.

## Notes

All responses will be JSON in the form of:

```json
{
	"code": "2xx/4xx/5xx",
	"status": "success/error",
	"body": Endpoint Response (see below)
}
```

## Endpoints

### `/shuffle`

Shuffle and save new deck.

Returns:

```json
{
	"id": "{new-guid}",
	"deck": [
		{
			"card": "ace",
			"suit": "spades",
			"number": 13,
			"colour": "black"
		},
		// etc
	]
}
```


### `/shuffle?id={id}`

Shuffle and update an *existing* deck.

> If no such `{id}` exists, an error will be thrown.

Returns:

```json
{
	"id": "{id}",
	"deck": [
		{
			"card": "three",
			"suit": "hearts",
			"number": 3,
			"colour": "red"
		},
		// etc
	]
}
```


### `/deck?id={id}`

Get the cards of a shuffled deck.

> If no such `{id}` exists, an error will be thrown.

Returns:

```json
{
	"id": "{id}",
	"deck": [
		{
			"card": "king",
			"suit": "clubs",
			"number": 12,
			"colour": "black"
		},
		// etc
	]
}
```


### `/deck/delete?id={id}`

Delete an existing deck of cards.

> If no such `{id}` exists, an error will be thrown.

