# meeper-kehet-com

Blog / link storage for personal use

## Release

Accept all pullrequests
```shell
gh pr list --json number | jq '.[].number' -r | while IFS=$'\t' read -r id; do gh pr merge $id --merge --auto ; done
```

Make new release
```shell
export VERSION="1.4.0"
git flow release start "${VERSION}"
git flow release finish "${VERSION}" --pushproduction --pushdevelop --pushtag
```
