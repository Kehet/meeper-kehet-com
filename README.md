# meeper-kehet-com

Blog / link storage for personal use

## Commands

Accept all pullrequests
```shell
gh pr list --json number | jq '.[].number' -r | while IFS=$'\t' read -r id; do gh pr merge $id --merge --auto ; done
```
