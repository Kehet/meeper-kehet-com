# meeper-kehet-com

Blog / link storage for personal use

## Release

Accept all pullrequests
```shell
gh pr list --json number | jq '.[].number' -r | while IFS=$'\t' read -r id; do gh pr merge $id --merge --auto ; done
```

Make new release
```shell
export VERSION="1.9.0"
git checkout develop && git push
gh workflow run 'Draft new release' --ref develop -f "version=${VERSION}"
```

test change
