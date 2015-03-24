package com.san.jshoutbox.web;

import java.util.List;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.dao.ShoutDAO;
import com.san.jshoutbox.model.ShoutEntry;
import com.san.jshoutbox.util.Constants;
import com.san.jshoutbox.web.command.ShoutBoxCommand;
import com.san.jshoutbox.web.view.CommonVelocityLayoutView;

@Controller("shoutBoxController")
public class ShoutBoxController {
	ShoutDAO shoutDAO = new ShoutDAO();

	@Autowired
	CommonVelocityLayoutView layoutView;
	String viewName = "shout";

	//@RequestMapping(value = "/shout", method = RequestMethod.GET)
	protected ModelAndView showForm() throws Exception {
		List<ShoutEntry> shouts = shoutDAO.readAll();
		ModelAndView mv = getDefaultModelAndView(viewName);
		mv.addObject("shouts", shouts);
		return mv;
	}

	//@RequestMapping(value = "/shout", method = RequestMethod.POST)
	protected ModelAndView onSubmit(ShoutBoxCommand cmd, HttpServletRequest request) throws Exception {
		ModelAndView mv = getDefaultModelAndView(viewName);

		shoutDAO.shout(cmd.getShouter(), cmd.getContent(), request.getRemoteHost());
		List<ShoutEntry> shouts = shoutDAO.readAll();
		mv.addObject("shouts", shouts);
		return mv;
	}

	protected ModelAndView getDefaultModelAndView(String viewName) {
		ModelAndView mav = new ModelAndView();
		layoutView.setUrl(viewName + ".vm");
		layoutView.setLayoutUrl(Constants.VIEW_LAYOUT_LAYOUT_VM);
		mav.setView(layoutView);
		mav.addAllObjects(layoutView.getIncludes());
		mav.addObject("title", viewName);
		return mav;
	}

}
