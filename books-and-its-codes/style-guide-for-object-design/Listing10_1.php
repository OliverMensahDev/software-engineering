<?
namespace Infrastructure\UserInterface\Web;

use Infrastructure\Web\Form\ScheduleMeetupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

final class MeetupController extends AbstractController
{
    public function scheduleMeetupAction(Request request): Response
    {
        form = this.createForm(ScheduleMeetupType.className);

        form.handleRequest(request);

        if (form.isSubmitted() && form.isValid()) {
            // ...

            return new RedirectResponse(
                '/meetup-details/' . meetup.meetupId()
            );
        }

        return this.render(
            'scheduleMeetup.html.twig',
            [
                'form' => form.createView()
            ]
        );
    }
}