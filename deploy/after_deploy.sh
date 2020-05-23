#!/usr/bin/env bash
set -e
read -ra HOSTS <<< $DEPLOY_HOSTS
for HOST in "${HOSTS[@]}"; do
    echo "Enabling artifact on "$HOST
    echo "[$HOST] $ chown www-data:www-data -R $ROOT_PATH-$CI_COMMIT_TAG && (rm -r $ROOT_PATH || true) && mv $ROOT_PATH-$CI_COMMIT_TAG $ROOT_PATH"
    ssh -oStrictHostKeyChecking=no -i $PK_PATH root@$HOST "chown www-data:www-data -R $ROOT_PATH-$CI_COMMIT_TAG && (rm -r $ROOT_PATH || true) && mv $ROOT_PATH-$CI_COMMIT_TAG $ROOT_PATH"
done

echo "Running migrations on last host :"
echo "[$HOST] $ cd $ROOT_PATH && mv php artisan migrate"
ssh -oStrictHostKeyChecking=no -i $PK_PATH root@$HOST "[$HOST] $ cd $ROOT_PATH && mv php artisan migrate"

rm $PK_PATH