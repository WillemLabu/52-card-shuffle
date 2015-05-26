> A project component to the [Intro to PHP](https://github.com/willemlabu/intro-to-php) shortcourse at The Open Window.

# 52 Card Shuffle

An API + UI to shuffle a deck of cards.

## Notes

All responses will be JSON in the form of:

```json
{
	"code": "2xx/4xx/5xx",
	"status": "success/error",
	"body": "Endpoint Response (see below)"
}
```

## Deck of cards

The array for the deck of cards, unshuffled can be seen in `/shuffle/index.php`.

If works as follows:

<kbd>c</kbd> = Clubs
<kbd>h</kbd> = Hearts
<kbd>d</kbd> = Diamonds
<kbd>s</kbd> = Spades

Each card then has a value.

<kbd>1</kbd> = Ace
<kbd>[2-10]</kbd> = 2 through 10
<kbd>11</kbd> = Jack
<kbd>12</kbd> = Queen
<kbd>13</kbd> = King

So, that makes

- <kbd>d10</kbd> the `10` of `Diamonds`
- <kbd>h13</kbd> the `King` of `Hearts`.

You get the gist. ;)


## Endpoints

### `/shuffle`

Shuffle and save new deck.

Returns:

```json
{
	"id": "{new-guid}",
	"deck": [
		"h10",
		"d7",
		"s8",
		"h1",
		"h7",
		"d5",
		"etc"
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
		"s9",
		"d1",
		"s10",
		"d11",
		"d8",
		"h9",
		"etc"
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
		"s9",
		"d1",
		"s10",
		"d11",
		"d8",
		"h9",
		"etc"
	]
}
```


### `/deck/delete?id={id}`

Delete an existing deck of cards.

> If no such `{id}` exists, an error will be thrown.

Returns

```json
{
	"id": "{id}",
	"deleted": true
}
```

