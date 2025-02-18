import app from 'flarum/admin/app';
import * as avatarOptions from '@dicebear/collection';

app.initializers.add('ordinaryjellyfish/flarum-dicebear', () => {
  const toKebabCase = (str: string) => {
    return str.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();
  };
  
  const options = Object.keys(avatarOptions).reduce((acc: { [key: string]: string }, key) => {
    const kebabKey = toKebabCase(key);
    const option = avatarOptions[key as keyof typeof avatarOptions];
    acc[kebabKey] = option.meta.title || '';
    return acc;
  }, {});

  app.extensionData
    .for('ordinaryjellyfish-dicebear')
    .registerSetting({
      setting: 'ordinaryjellyfish-dicebear.avatar_style',
      label: app.translator.trans('ordinaryjellyfish-dicebear.admin.avatar_style'),
      help: app.translator.trans('ordinaryjellyfish-dicebear.admin.avatar_style_help', {
        a: <a href="https://www.dicebear.com/styles/" />
      }),
      type: 'select',
      options
    })
    .registerSetting({
      setting: 'ordinaryjellyfish-dicebear.api_url',
      label: app.translator.trans('ordinaryjellyfish-dicebear.admin.api_url'),
      help: app.translator.trans('ordinaryjellyfish-dicebear.admin.api_url_help'),
      type: 'text'
    })
});
