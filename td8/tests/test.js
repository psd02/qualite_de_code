import { Selector } from 'testcafe';

fixture('Test formulaire')
    .page('http://localhost:8000');

test('Doit afficher le nom en majuscule', async t => {

    const input = Selector('#name');
    const button = Selector('#button');
    const result = Selector('#result');

    await t
        .typeText(input, 'alex')
        .click(button)
        .expect(result.innerText).eql('ALEX');
});