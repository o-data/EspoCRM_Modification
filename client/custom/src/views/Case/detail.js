Espo.define('custom:views/case/detail', 'views/detail', function (Dep) {

    return Dep.extend({

        relatedAttributeMap: {
            'properties': {
                'name': 'name',
            },
        }
    });
});
